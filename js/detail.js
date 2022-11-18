let sub = document.querySelector(".product-detail_btn-sub");
let input = document.querySelector(".product-detail_btn-input");
let add = document.querySelector(".product-detail_btn-add");


sub.addEventListener("click", function () {
  if (Number(input.value) > 1) {
    input.value = Number(input.value) - 1;
  }
});

add.addEventListener("click", function () {
  input.value = Number(input.value) + 1;
});

if (input.value < 1) {
  input.value = 1;
}

// control menu

const Menu_Control = document.querySelectorAll(".menu_control");
const Item_Control = document.querySelectorAll(".item_control");


Menu_Control.forEach((btn)=> {
  
  btn.addEventListener('click', function() {

    Menu_Control.forEach((button)=> {
      button.classList.remove('activate')
    }); 
    let type = this.getAttribute('type_ctr')
    this.classList.add('activate')
    
    Item_Control.forEach((item)=> {
      item.classList.remove('activate')
      let type1 = item.getAttribute('type_ctr');
      if(type1==type) {
        item.classList.add('activate')
      }
    })
  })
})

// control star

let star = document.querySelectorAll('form .star_comment i')

let val_star = document.querySelector('form .value')

for(let i=0;i<star.length;i++) {
  star[i].addEventListener('click', function() {
    for(let k=0; k< star.length; k++) {
      star[k].classList.remove('activate')
    }
    if(i==0) {
      star[0].classList.add('activate')
      val_star.value = 1;
    } else {
      val_star.value = i+1;
      for(let j=0;j<=i;j++) {
        star[j].classList.add('activate')
      }
    }
  })
}


let input_comment = document.querySelector('.form_comment-input-text')
let btn_comment = document.querySelector('.form_comment-input-btn')
let btn_comment_confirm = document.querySelector('.form_comment-input-btn input')
let btn_comment_cancel = document.querySelector('.form_comment-input-btn button')


input_comment.addEventListener('click', function() {
  input_comment.classList.add('activate')
  btn_comment.classList.add('activate')
})

input_comment.addEventListener('keyup' , function() {
  if(input_comment.value!='') {
    btn_comment_confirm.classList.add('activate')
  } else 
    btn_comment_confirm.classList.remove('activate')
})

btn_comment_cancel.addEventListener('click', function(e) {
  e.preventDefault();
  btn_comment.classList.remove('activate')
})