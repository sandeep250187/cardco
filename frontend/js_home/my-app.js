 
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s);
js.id = id;
js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
 

 (function() {

var today = new Date();
var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
var input1 = document.querySelector('#datepicker, #flightdate');
input1.value = fecha.format(today, 'YYYY-MM-DD') + ' - ' + fecha.format(tomorrow, 'YYYY-MM-DD');
var demo1 = new HotelDatepicker(input1, {
showTopbar: true,
moveBothMonths: true
});

})
();
 
$('[data-toggle="tooltip"]').tooltip();
$('.carousel').carousel({
pause: "true",
interval: 10000
});
 
 
$("#owlexample").owlCarousel({
// Most important owl features
items: 4,
itemsScaleUp: false,
autoPlay: true,
stopOnHover: true,
navigation: true,
navigationText: [
"<i class='fa fa-angle-left'></i>",
"<i class='fa fa-angle-right'></i>"
],
// navigationText : ["prev","next"],
rewindNav: true,
scrollPerPage: false,
//Pagination
pagination: false,
paginationNumbers: false,
// Responsive
responsive: true,
responsiveRefreshRate: 200,
responsiveBaseWidth: window,
});
 
$("#owlexample1").owlCarousel({
// Most important owl features
items: 3,
itemsScaleUp: false,
autoPlay: true,
stopOnHover: true,
navigation: true,
navigationText: [
"<i class='fa fa-angle-left'></i>",
"<i class='fa fa-angle-right'></i>"
],
// navigationText : ["prev","next"],
rewindNav: true,
scrollPerPage: false,
//Pagination
pagination: false,
paginationNumbers: false,
// Responsive
responsive: true,
responsiveRefreshRate: 200,
responsiveBaseWidth: window,
});
 
$("#hotelpartner").owlCarousel({
// Most important owl features
items: 8,
itemsScaleUp: false,
autoPlay: true,
pagination: false,
stopOnHover: true,
navigation: false,
responsiveClass: true,
});
 
 
$('select').niceSelect();
  
