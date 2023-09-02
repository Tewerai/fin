var item = document.querySelectorAll('#present');
var absentee = document.querySelectorAll('#absent');
var paymentSubmission ;

for (let i = 0; i < item.length; i++){
    item[i].addEventListener('click',add,false);    
    absentee[i].addEventListener('click',bunker,false);    
}


function add(e){
    var name = $(this).parent().prev().prev().prev().text(); 
    var surname =$(this).parent().prev().prev().text(); 
    var studentId = $(this).parent().prev().text(); 
    console.log(name,surname,studentId);
    // dealing with database
    $.ajax({
        url:"php/attendance.php",
        method:"POST",
        data:{
            present: 'present',
            name: name,
            surname: surname,
            studentId: studentId,
        },
        dataType:"text",
        success:function(data)
        {
        }
    });
   $(this).closest('tr').hide();
  }

  function bunker(e){
    var name = $(this).parent().prev().prev().prev().prev().text(); 
    var surname =$(this).parent().prev().prev().prev().text(); 
    var studentId = $(this).parent().prev().prev().text(); 
    var num =  $(this).parent().next().val();
    console.log(name,surname,studentId,num);

    // insert records to database
    $.ajax({
        url:"php/attendance.php",
        method:"POST",
        data:{
            absent: 'absent',
            name: name,
            surname: surname,
            studentId: studentId,
            parentsContact:num,
        },
        dataType:"text",
        success:function(data)
        {
        }
    });
   $(this).closest('tr').hide();

}

$('#submi').click(function (e) {
    $.ajax({
        url:'php/fees.php',
        method:'POST',
        data:{
            studentId: $('#studentid').val(),
            amount: $('#amount').val(),
        }
    })
})