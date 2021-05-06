// const { default: axios } = require("axios");

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    let Formulaire = document.querySelector("#FormData");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      local:'UK',
      headerToolbar:{

        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek'
      },
      dateClick:function(info){

        Formulaire.reset();
        Formulaire.start.value = info.dateStr;
        Formulaire.end.value = info.dateStr; 

        document.getElementById("event").style.display = "block";

      },
      events:"http://127.0.0.1:8000/event/show",
      eventClick:function(info){
        var event = info.event;
        console.log(info.event.id);

        axios.post("http://127.0.0.1:8000/event/edit/"+info.event.id).then(
          (request)=>{ 
            console.log(request.data[0].start);
           Formulaire.description.value = request.data[0].description;
           Formulaire.start.value = request.data[0].start;
           Formulaire.end.value = request.data[0].end;
           Formulaire.title.value = request.data[0].title;
           Formulaire.id.value = request.data[0].id;
           document.getElementById("event").style.display = "block";
          }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response)
              }
            }
          )
      }
      
    });

    var btnclose = document.getElementById('close');
    btnclose.addEventListener("click",()=>{

        document.getElementById("event").style.display = "none";
    });
    var btnfermer = document.getElementById('fermer');
    btnfermer.addEventListener("click",()=>{

        document.getElementById("event").style.display = "none";
    });

    calendar.render();

    document.getElementById("btnAdd").addEventListener("click",()=>{
      EnvirData("http://127.0.0.1:8000/event/Add");
    });

    document.getElementById("btnDelete").addEventListener("click",()=>{
    EnvirData("http://127.0.0.1:8000/event/delete/"+Formulaire.id.value);
  });

  document.getElementById("btnUpdate").addEventListener("click",()=>{
    console.log(Formulaire.id.value);
    EnvirData("http://127.0.0.1:8000/event/update/"+Formulaire.id.value);
  });

  function EnvirData(url){
    const data = new FormData(Formulaire);
    axios.post(url,data).then(
    (request)=>{
      calendar.refetchEvents();
      document.getElementById("event").style.display = "none";
    }
    ).catch(
      error=>{
        if(error.response){
          console.log(error.response)
        }
      }
    )
  }

  });
