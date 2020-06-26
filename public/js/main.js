var selected_time = null;

//format date in yy-mm-dd
function formatDate(date) {
  var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2)
    month = '0' + month;
  if (day.length < 2)
    day = '0' + day;

  return [year, month, day].join('-');
}



//function for datepicker to show 100 years back date for DOB
$(function () {
  $("#dob").datepicker({
    changeMonth: true,
    changeYear: true,
    minDate: new Date(1920, 2 - 1, 26),
    maxDate: new Date(),
    yearRange: "-100:+0",
    dateFormat: 'yy-mm-dd'
  });
});

//MAIN FUNCTION FOR MAKE APPOINTMENT
$(function () {
  var physio_select = null;
  var physio_detail = null;
  var selected_date = null;
  var booked_time = null;
  var unavailable_date = [];

  //setup for AJax work
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#loading').hide();
  $('#date_time_select').hide();

  //If Councellor is selected get his details and unavailability
  $('#nav-list').on('click', 'li', function () {
    $('#nav-list li.active').removeClass('active');
    $(this).addClass('active');
    physio_select = $(this).attr('rel');
    physio_detail = $(this).html();
    unavailable_date = [];
    $("#datepicker").datepicker('refresh');

    $.post('get_unavailable_time', { user_id: physio_select }, function (data) {

      var json = $.parseJSON(data);

      $.each(json, function (i, item) {
        unavailable_date.push(item['unavailable_date']);
      });
      // console.log(unavailable_date);
    });
  });


  //function to disable certain dates
  function DisableDates(date) {
    var string = formatDate(date);
    //console.log(string);
    return [unavailable_date.indexOf(string) == -1, ""];
  }

  //Go back funtion
  $('#back').click(function () {
    $('#date_time_select').hide();
    $('#time_slots').hide();
    $('#nav-list').show();
    $("#datepicker").datepicker('setDate', null);
  })

  //function to get the available schedule
  $('#get_schedule').click(function () {
    if (physio_select != null) {
      $('#nav-list').hide();
      $('#date_time_select').show();
      $('#time_slots').show();
      $('#selected_physio').html(physio_detail);
    }
    else
      alert('Please select a Counsellor first.');
  });

  //Main function with appointment datepicker
  $("#datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    autoSize: true,
    minDate: +1,
    beforeShowDay: DisableDates,
    onSelect: function (dateText) {
      if (!unavailable_date.includes(dateText)) {
        $('#time_slots').show();
        selected_date = dateText;
        var times = ["10:00", "11:00", "12:00", "02:00", "03:00", "04:00"];
        var outputString = '<p>Available Time:</p><ul class="list-group nav-list selected_time list-inline" id="time-list">';

        $.post('check_booked_time', { physio_id: physio_select, date_selected: selected_date }, function (data) {

          var json = $.parseJSON(data);
          $.each(json, function (i, item) {
            times = times.filter((value) => value != item['appointment_time']);
          });

          for (i = 0; i < times.length; i++) {
            outputString += '<li class="list-group-item" rel="' + times[i] + '"  onclick="getTime(this)">' + times[i] + '</li>';
          }
          outputString += '</ul>';
          $("#time_slots").html(outputString);
        });
      }
    }
  });

  //Function to confirm appointment and save to database
  $('#confirm_appointment').click(function () {
    if (selected_time != null) {
      $('#loading').show();
      $.post('save_appointment', { physio_id: physio_select, date_selected: selected_date, time_selected: selected_time }, function (data) {
        if (data == 'success')
          location.reload();
        else {
          $('#loading').hide();
          alert(data);
        }
      });
    } else {
      alert('Please select an available time.');
    }

  });
});

//function to highlight the selected time
function getTime(element) {
  var list_select = $("#time-list li");
  $('#time-list li.active').removeClass('active');
  $(element).addClass('active');
  selected_time = $(element).attr('rel');
}

$(document).ready(function () {
  $('.datatable').DataTable({
    "aaSorting": []
  });
});



//Main function for Unavailability management
$(function () {
  var unavailability_date = null;
  var exclude_date = [];
  $.post('get_unavailable_time', {}, function (data) {

    var json = $.parseJSON(data);
    $.each(json, function (i, item) {
      exclude_date.push(item['unavailable_date']);
    });
    //   console.log(exclude_date);
  });


  //disable certain dates
  function DisableDates(date) {
    var string = formatDate(date);
    //console.log(string);
    return [exclude_date.indexOf(string) == -1, ""];
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#unavailability_datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    autoSize: true,
    todayHighlight: true,
    minDate: +1,
    beforeShowDay: DisableDates,
    onSelect: function (dateText) {
      unavailability_date = dateText;
    }
  });


  $('#confirm_unavailability').click(function () {
    if (unavailability_date != null) {
      console.log(unavailability_date);
      $('#loading').show();
      $.post('save_availability', { date_selected: unavailability_date }, function (data) {
        if (data == 'success')
          location.reload();
        else {
          $('#loading').hide();
          alert(data);
        }
      });
    } else {
      alert('Please select your unavailable date.');
    }

  });
});
