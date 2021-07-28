
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var to_day = new Date();
    var to_y= to_day.getFullYear();
    var to_m= to_day.getMonth()+1;
    var to_d= to_day.getDate();
      
    if(to_d<10){
       to_d='0'+to_d;
    }
    if(to_m<10){
       to_m='0'+to_m;
    }
  
    var to_full_day = to_y+'-'+to_m+'-'+to_d;   
    console.log(to_full_day);
      
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: to_full_day,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        // 20.06
        {
          title: '부평영화상영회',
          start: '2020-06-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2020-06-07',
          end: '2020-06-10'
        },
        {
          title: '평부컴퍼니',
          start: '2020-06-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2020-06-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2020-06-11',
          end: '2020-06-13'
        },
        {
          title: '연극 시사회',
          start: '2020-06-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2020-06-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2020-06-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2020-06-25T20:00:00'
        },
        // 21.06
        {
          title: '부평영화상영회',
          start: '2021-06-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2021-06-07',
          end: '2021-06-10'
        },
        {
          title: '평부컴퍼니',
          start: '2021-06-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2021-06-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2021-06-11',
          end: '2021-06-13'
        },
        {
          title: '연극 시사회',
          start: '2021-06-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2021-06-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2021-06-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2021-06-25T20:00:00'
        },
        {
          title: '합창단 정기연습',
          start: '2021-06-28'
        },
        // 20.07
        {
          title: '부평영화상영회',
          start: '2020-07-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2020-07-07',
          end: '2020-07-10'
        },
        {
          title: '평부컴퍼니',
          start: '2020-07-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2020-07-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2020-07-11',
          end: '2020-07-13'
        },
        {
          title: '연극 시사회',
          start: '2020-07-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2020-07-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2020-07-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2020-07-25T20:00:00'
        },
        // 21.07
        {
          title: '부평영화상영회',
          start: '2021-07-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2021-07-07',
          end: '2021-07-10'
        },
        {
          title: '평부컴퍼니',
          start: '2021-07-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2021-07-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2021-07-11',
          end: '2021-07-13'
        },
        {
          title: '연극 시사회',
          start: '2021-07-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2021-07-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2021-07-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2021-07-25T20:00:00'
        },
        {
          title: '합창단 정기연습',
          start: '2021-07-28'
        },
        // 20.08
        {
          title: '부평영화상영회',
          start: '2020-08-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2020-08-07',
          end: '2020-08-10'
        },
        {
          title: '평부컴퍼니',
          start: '2020-08-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2020-08-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2020-08-11',
          end: '2020-08-13'
        },
        {
          title: '연극 시사회',
          start: '2020-08-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2020-08-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2020-08-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2020-08-25T20:00:00'
        },
        // 21.08
        {
          title: '부평영화상영회',
          start: '2021-08-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2021-08-07',
          end: '2021-08-10'
        },
        {
          title: '평부컴퍼니',
          start: '2021-08-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2021-08-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2021-08-11',
          end: '2021-08-13'
        },
        {
          title: '연극 시사회',
          start: '2021-08-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2021-08-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2021-08-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2021-08-25T20:00:00'
        },
        {
          title: '합창단 정기연습',
          start: '2021-08-28',
          end: '2021-08-31'
        },
        // 20.09
        {
          title: '부평영화상영회',
          start: '2020-09-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2020-09-07',
          end: '2020-09-10'
        },
        {
          title: '평부컴퍼니',
          start: '2020-09-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2020-09-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2020-09-11',
          end: '2020-09-13'
        },
        {
          title: '연극 시사회',
          start: '2020-09-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2020-09-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2020-09-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2020-09-25T20:00:00'
        },
        // 21.09
        {
          title: '부평영화상영회',
          start: '2021-09-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2021-09-07',
          end: '2021-09-10'
        },
        {
          title: '평부컴퍼니',
          start: '2021-09-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2021-09-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2021-09-11',
          end: '2021-09-13'
        },
        {
          title: '연극 시사회',
          start: '2021-09-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2021-09-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2021-09-20T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2021-09-20T20:00:00'
        },
        {
          title: '발레단 연습',
          start: '2021-09-21T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2021-09-21T20:00:00'
        },
        {
          title: '합창단 정기연습',
          start: '2021-09-28',
          end: '2021-09-31'
        },
        // 20.10
        {
          title: '부평영화상영회',
          start: '2020-10-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2020-10-07',
          end: '2020-10-09'
        },
        {
          title: '평부컴퍼니',
          start: '2020-10-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2020-10-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2020-10-11',
          end: '2020-10-13'
        },
        {
          title: '연극 시사회',
          start: '2020-10-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2020-10-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2020-10-25T17:30:00'
        },
        {
          title: '발레단 평가',
          start: '2020-10-25T20:00:00'
        },
        // 21.09
        {
          title: '부평영화상영회',
          start: '2021-10-01'
        },
        {
          title: '뮤지컬 강의',
          start: '2021-10-07',
          end: '2021-10-10'
        },
        {
          title: '평부컴퍼니',
          start: '2021-10-09T09:00:00'
        },
        {
          title: '강남오피스',
          start: '2021-1009-16T16:00:00'
        },
        {
          title: '그린 정기 주주총회',
          start: '2021-10-11',
          end: '2021-10-13'
        },
        {
          title: '연극 시사회',
          start: '2021-10-13T10:30:00'
        },
        {
          title: '예술원정대 발대식',
          start: '2021-10-13T16:30:00'
        },
        {
          title: '발레단 연습',
          start: '2021-10-20T17:30:00'
        }
      ]
    });

    calendar.render();
  });