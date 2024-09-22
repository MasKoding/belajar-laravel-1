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




  // ketika character > 150
  // muncul hanya 150 & readmore button
  // click read more =>show all text & show less button
  // click show less=> hide text 150 & hide show less & show read more


//   tiny mce editor

tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
})



