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






})



