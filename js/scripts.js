var dropdown = document.getElementsByClassName("dropdown");

if (dropdown.length >= 1) {
  for (let i = 0; i < dropdown.length; i++) {
    const item = dropdown[i];

    var menu, btn, overflow;

    item.addEventListener("click", function () {
      for (let i = 0; i < this.children.length; i++) {
        const e = this.children[i];
        

        if (e.classList.contains("menu")) {
          menu = e;
        } else if (e.classList.contains("menu-btn")) {
          btn = e;
        } else if (e.classList.contains("menu-overflow")) {
          overflow = e;
        }
      }

      if (menu.classList.contains("hidden")) {
        // show the menushi
        showMenu();
      } else {
        // hide the menu
        hideMenu();
      }
    });

    var showMenu = function () {
      menu.classList.remove("hidden");
      menu.classList.add("fadeIn");
      overflow.classList.remove("hidden");
    };

    var hideMenu = function () {
      menu.classList.add("hidden");
      overflow.classList.add("hidden");
      menu.classList.remove("fadeIn");
    };
  }
}


var btnBaru = document.getElementsByClassName("pesanBrBtn");
var tblBaru = document.getElementsByClassName("pesanBr");

var btnTerima = document.getElementsByClassName("pesanTrBtn");
var tblTerima = document.getElementsByClassName("pesanTr");

function baru()  {
  btnBaru.classList.remove("text-black");
  
  btnBaru.classList.add("text-white");
  btnBaru.classList.add("bg-black");
  
  
  btnTerima.classList.add("text-black");
  
  btnTerima.classList.remove("text-white");
  btnTerima.classList.remove("bg-black");

  
  tblBaru.classList.remove("hidden");
  
  tblTerima.classList.add("hidden");
}

function terima()  {
  btnTerima.classList.remove("text-black");
  
  btnTerima.classList.add("text-white");
  btnTerima.classList.add("bg-black");
  
  
  btnBaru.classList.add("text-black");
  
  btnBaru.classList.remove("text-white");
  btnBaru.classList.remove("bg-black");

  
  tblTerima.classList.remove("hidden");
  
  tblBaru.classList.add("hidden");
}




