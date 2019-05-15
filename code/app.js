app = {
    init: function () {
        console.log("init");
        $.get("data.json")
            .done(app.onSuccess)
            .fail(app.onError);
    },
    onSuccess: function (jsonData) {
        console.log(jsonData);
        let list = jsonData.RateList;
        list.forEach(element => {
            let html = `
            <style>
            .${element.Class} {
                width: ${element.Rate};
                animation: ${element.Class} 1.5s;
            }
            
            @keyframes ${element.Class} {
                0% {
                    width: 0%;
                }
            
                100% {
                    width: ${element.Rate};
                }
            }
            </style>
            <li>
            <h3>${element.Title}</h3><span class="bar"><span class="${element.Class}"></span></span>
            <p>${element.Rate}</p>
            </li>`;
            $("#rates").append(html);
        });

        let list2 = jsonData.ThingList;
        list2.forEach(elements => {
            let html2 = `<h3>${elements.Type}:<h3>`;
            let thingList = elements.Thing;
            thingList.forEach(element => {
                let state = (element.State == "on") ? "checked" : "";
                html2 += `<div class="object">${element.Name}
                    <label class="switch">
                    <input type="checkbox"`+state+`>
                    <span class="slider round"></span>
                    </label>
                    </div>`;
            });
            $("#things").append(html2);
        });
    },
    onError: function (e) {
        console.log("Error");
    }
}



$(document).ready(app.init);