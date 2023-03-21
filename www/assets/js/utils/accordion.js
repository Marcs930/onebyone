//アコーディオンをクリックした時の動作
$('.qa-qa__question').on('click', function() {//タイトル要素をクリックしたら
  var findElm = $(this).next(".qa-qa__answer");//直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle();//アコーディオンの上下動作

  if($(this).hasClass('--close')){//タイトル要素にクラス名closeがあれば
    $(this).removeClass('--close');//クラス名を除去し
  }else{//それ以外は
    $(this).addClass('--close');//クラス名closeを付与
  }
});

//ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
$(window).on('load', function(){
  $('.faq li').addClass("open"); //faqのはじめのliにあるsectionにopenクラスを追加
  $(".open").each(function(index, element){ //openクラスを取得
    var Title =$(element).children('.title-box'); //openクラスの子要素のtitleクラスを取得
    $(Title).addClass('close');       //タイトルにクラス名closeを付与し
    var Box =$(element).children('.box'); //openクラスの子要素boxクラスを取得
    $(Box).slideDown(500);          //アコーディオンを開く
  });
});


//アコーディオンをクリックした時の動作

// const searchTableSecondaryList = document.querySelectorAll('.searchTable__secondaryList');
// console.log(searchTableSecondaryList);
// for(let i = 0; i < searchTableSecondaryList.length; i++) {
//   if(!(searchTableSecondaryList[i].classList.contains('--open'))) {
//     searchTableSecondaryList[i].style.display= 'none';

//   }
// }


$('.searchTable__primaryList').on('click', function() {//タイトル要素をクリックしたら
  var findElm = $(this).children(".searchTable__secondaryList");//直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle();//アコーディオンの上下動作

  if($(this).hasClass('--close')){//タイトル要素にクラス名closeがあれば
    $(this).removeClass('--close');//クラス名を除去し
  }else{//それ以外は
    $(this).addClass('--close');//クラス名closeを付与
  }
});

// //ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
// $(window).on('load', function(){
//   $('.searchTable__primaryList').addClass("open"); //faqのはじめのliにあるsectionにopenクラスを追加
//   $(".open").each(function(index, element){ //openクラスを取得
//     var Title =$(element).children('.searchTable__secondaryList'); //openクラスの子要素のtitleクラスを取得
//     $(Title).addClass('close');       //タイトルにクラス名closeを付与し
//     var Box =$(element).children('.searchTable__secondaryList'); //openクラスの子要素boxクラスを取得
//     $(Box).slideDown(500);          //アコーディオンを開く
//   });
// });