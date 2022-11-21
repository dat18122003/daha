var item_control = document.querySelectorAll('.controler ul li');

var item_content = document.querySelectorAll('.list_order')

item_control.forEach((item)=>{
    item.addEventListener('click', function() {
        item_control.forEach((i)=>{
            i.classList.remove('activate')
        })
        item_content.forEach(e=>{
            e.classList.remove('activate')
            if(e.getAttribute('type_control')==this.getAttribute('type_control')) {
                e.classList.add('activate')
            }
        })
        
        this.classList.add('activate');
        
    })
})