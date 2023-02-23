//ref-flag
var ref = document.referrer;
var hereHost = window.location.hostname;
var herePath = hereHost + window.location.pathname;

var sStr = "^https?://" + hereHost;
var rExp = new RegExp(sStr, "i");

if (ref.match(rExp)) {
  $('#loading').hide();
  var refFlag = 1;
  var refFlagTime = 0;
} else {
  var refFlag = 0;
  var refFlagTime = 2200;
}

//load
var root = document.documentElement;
document.body.onload = function() {
  setTimeout(function() {
    document.body.style.minHeight = $(window).height() + "px";
    root.style.setProperty("--main-height", $(window).height() + "px");
    document.getElementById("loading").classList.add("loaded")

  }, refFlagTime);
};

//linkAutoBlank
$('a[href^=http]')
  .not('[href*="' + location.hostname + '"]')
  .attr({
    target: "_blank"
  }).attr({
    rel: "noopener nofollow"
  });

//scroll
$('a[href^="#"]').on('click', function() {
  var href = $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top - 60;
  $("html, body").animate({
    scrollTop: position
  }, 550, "swing");
  return false;
});

/** ===================================================
 *  TOP
 *  =================================================== */

//hamburgerBtn
$('.js-hamburgerBtn').on('click', function() {
  $(this).toggleClass('is-open');
  $('.headNav').toggleClass('is-open');
})

const hamburgerBtn = document.querySelector(".js-hamburgerBtn")
const header = document.querySelector(".header");

const clickHandler = () => {
  hamburgerBtn.classList.toggle("is-open");
  header.classList.toggle("is-open");
  console.log("ok");
}
hamburgerBtn.addEventListener('click',clickHandler);
