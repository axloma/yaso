const log = document.getElementById('login_img');
const item = document.querySelectorAll(".nav-bar-i a");
//login
log.addEventListener("dblclick", () => {
   window.location.href = "yasser.php";
    // Simulate an HTTP redirect:
  // window.location.replace("msg.php");
  alert("go to yaso");

});
let sections = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('.nav-bar-i a');

//////////////form media queria
let x = document.querySelector('.myname');
let nav = document.querySelector('.nav-bar-i');
x.onclick = () => {  nav.classList.toggle('openmenue');}


window.onscroll = () => {
    let header = document.querySelector('.nav-bar');
    header.classList.toggle('sticky' , window.scrollY > 100 );
   // document.getElementById('contact').className="active"
  
//hide 
sections.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 100  ;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id');

// console.log(top,offset,height,id);
//"if sy grater than section top and sy less than section top + section height than"
if(top >= offset && top < offset + height ){
    navlinks.forEach(links =>{
        links.classList.remove('active');
        document.querySelector('.nav-bar-i a[href*=' + id +']').classList.add('active');
        
    });
}
nav.classList.remove('openmenue');
});



}

console.log(navigator.cookieEnabled);//
let date = new Date();
date.setTime(date.getTime() + 1 * 24 * 60 *60 * 1000 );
let expire = "expires="+ date.toUTCString();
document.cookie="name=yasser2; expires=Sun, 01 january 2024 09:15:38 UTC;path=/;";
// document.cookie `"name=yasser2;expires=${ }"`;
// console.log(document.cookie);
const cookie = decodeURIComponent(document.cookie)  ;
const carray = cookie.split("; ");
// console.log(carray);
console.log(typeof(cookie));


// const item = document.querySelectorAll(".nav__item");

// item.forEach(link => {
//   link.addEventListener("click", function () {
//     link.classList.add("nav__item--active");
//   });
// });


    