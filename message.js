function message(){
    var Name = document.getElementById('name');
    var email = document.getElementById('email');
    var ph = document.getElementById('ph');
    var blood = document.getElementById('blood');
    var date = document.getElementById('date');
    var time = document.getElementById('time');


    const dan = document.getElementById('dan');
    const danger = document.getElementById('danger');

    if(Name.value != '' || email.value != '' || ph.value != '' || date.value != '' || blood.value != '' || time.value !='' )
        {
            setTimeout(() => {
                Name.value ='';
                email.value = '';
                ph.value = '';
                date.value = '';
                blood.value = '';
                time.value = '';
            }, 2000);
        danger.style.display = 'block';
    }
    else{

        dan.style.display = 'block';
    }


    setTimeout(() => {
        danger.style.display = 'none';
        dan.style.display = 'none';
    }, 4000);

}