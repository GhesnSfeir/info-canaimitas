<br/>

<ul id="faq"></ul>    

<script type="text/javascript">

    function GetListFaq()
    {
        $.get("scripts/FAQ-cargar-faq.php", function(resultado){
            console.log("Recibo: ");
            if(resultado == false)
            {
                console.log("resultado");
                alert("Error");
            }
            else
            {    
                $('#faq').append(resultado); 
            }
        }); 
    }


    $(document).ready(function()
    {
        GetListFaq();
    });

</script>