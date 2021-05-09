// const { default: axios } = require("axios");

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    let Formulaire = document.querySelector("#FormData");
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar:{

        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,listWeek'
      },
      timeZone: 'local',
      dateClick:function(info){

        console.log(info.date.toISOString());
        const d = new Date();
        const dateTimeLocalValue = (new Date(d.getTime() - d.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
        console.log(dateTimeLocalValue);
        Formulaire.reset();
        Formulaire.start.value = dateTimeLocalValue;
        Formulaire.end.value = dateTimeLocalValue; 

        document.getElementById("event").style.display = "block";

      },
      events:"http://127.0.0.1:8000/event/show",
      eventClick:function(info){
        var event = info.event;
        console.log(info.event.id);
        var id = info.event.id;
        axios.post("http://127.0.0.1:8000/event/edit/"+id).then(
          (request)=>{ 
           console.log(request.data.length);
           const d = new Date(request.data[0].start);
           const d_1 = new Date(request.data[0].end);
           const dateTimeLocalValue = (new Date(d.getTime() - d.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
           const dateTimeLocalValue_fin = (new Date(d_1.getTime() - d_1.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
           Formulaire.description.value = request.data[0].description;
           Formulaire.start.value =dateTimeLocalValue;
           Formulaire.end.value = dateTimeLocalValue_fin;
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
      console.log("hi");
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
