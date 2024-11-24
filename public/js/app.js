$(document).ready(function(){

    const maxLength = 150
    var fullTextDescription = $(".main-description").html().trim();
    var fullTextLength = fullTextDescription.length;
    var readMoreHtml =`<a href="#" class="read-more">Read More</a>`
    var showLessHtml =`<a href="#" class="show-less">Show Less</a>`

    function truncateHtml(fullTextDescription,fullTextLength,maxLength){
        if(fullTextLength>maxLength){
            var truncateHtml =fullTextDescription.substring(0,maxLength) + '... '+readMoreHtml
            $(".main-description").html(truncateHtml);
            $(".read-more").show();
        }else{

            $(".read-more").hide();
        }
    }

    function showAllHtml(fullTextDescription){

        $(".main-description").html(fullTextDescription+showLessHtml);
    }

    truncateHtml(fullTextDescription,fullTextLength,maxLength)

    $(document).on("click",".read-more",function(){
        console.log(fullTextDescription)
        showAllHtml(fullTextDescription)

        $(".read-more").hide();


        $(".show-less").click(function(){

            truncateHtml(fullTextDescription,fullTextLength,maxLength)
            $(".show-less").hide();

            $(".read-more").show();

        });
    })


 // action like
 // syntax utama $("selector").on("event",function(){
// class pake symbol .
// id pake symbol #
// function anonymous tidak punya nama return nilai

$(".btn-like-comment").click(function(){

    // get total like
    var totalLike = $(this).find(".total-like").text();
    console.log("total like before:",totalLike)
    totalLike = parseInt(totalLike.trim())+1;
    // set total like
    var totalLikeNumber = totalLike;
    console.log("total like after:",totalLikeNumber)
    $(".total-like").text(totalLikeNumber)

    // ubah warna
    // fungsi
    $(this).find(".fa-heart").css("color","red")


 })


 // lakukan event on enter
    $("#searchPost").on("keyup",function(e){

        if(e.which === 13){
            //Digniss
            var searchValue = $(this).val();
            window.location.href = "/blog/search/"+searchValue
        }
    })
})



