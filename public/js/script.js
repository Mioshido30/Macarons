$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        900:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
        }
    }
})

const minus = document.querySelector('.minus');
const plus = document.querySelector('.plus');
const amount = document.querySelector('.amount');

let a = 1;
minus.addEventListener('click', () => {
    if(a > 1){
        a--;
        amount.innerText = a;
        document.getElementById("amount").value = a;
    }
});

plus.addEventListener('click', () => {
    a++;
    amount.innerText = a;
    document.getElementById("amount").value = a;
});


