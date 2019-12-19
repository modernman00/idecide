  $(document).ready(function(){
    // const id = (x)=> document.getElementById(x);
    // const baseline = 48;
    // const passmark = 41;
    // const referred = 24;

    // const submit = (e)=> {
    //    e.preventDefault();
    //    console.log(id('incomeSource').value);
    // };

    // document.getElementById('submit').addEventListener('click', () =>{
    //     alert(id('incomeSource').value);
    // });

    $('#submit').on('click', function(e) {
        e.preventDefault();

        const formData = $('form').serialize();
       // console.log(formData);

     //   alert(formData);

        $.ajax({
            type:'POST',
            url:'/main',
            // url: $('form').attr('action'),
            data:formData,
            success: function () {
               // var response = jQuery.parseJSON(data);
                $('.notification').css('display', 'block')
                    .delay(6000)
                    .slideUp(300)
                    .html('It was a succuess');
            },
        });

        // var ul = document.createElement('ul');

        // $.each(formData, function (key, value) {
        //     var li = document.createElement('li');
        //     li.appendChild(document.createTextNode(value));
        //     ul.appendChild(li);

        // });

        // $('.notification').css('display', 'block').delay(6000).removeClass('w3-teal').addClass('w3-red').slideUp(300).html(ul);
    });

});



