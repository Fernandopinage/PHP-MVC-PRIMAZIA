
<script type="text/javascript">
    function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
        r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        r = r.replace(/^(\d*)/, "($1");
    }
    return r;
    }
</script>


   <script>
     $(document).ready(function() {

       function limpa_formulário_cep() {
         // Limpa valores do formulário de cep.
         $("#rua").val("");
         $("#bairro").val("");
         $("#cidade").val("");
         $("#uf").val("");
         $("#ibge").val("");
       }

       //Quando o campo cep perde o foco.
       $("#cep").blur(function() {

         //Nova variável "cep" somente com dígitos.
         var cep = $(this).val().replace(/\D/g, '');

         //Verifica se campo cep possui valor informado.
         if (cep != "") {

           //Expressão regular para validar o CEP.
           var validacep = /^[0-9]{8}$/;

           //Valida o formato do CEP.
           if (validacep.test(cep)) {

             //Preenche os campos com "..." enquanto consulta webservice.
             $("#rua").val("...");
             $("#bairro").val("...");
             $("#cidade").val("...");
             $("#uf").val("...");
             $("#ibge").val("...");

             //Consulta o webservice viacep.com.br/
             $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

               if (!("erro" in dados)) {
                 //Atualiza os campos com os valores da consulta.
                 $("#rua").val(dados.logradouro);
                 $("#bairro").val(dados.bairro);
                 $("#cidade").val(dados.localidade);
                 $("#uf").val(dados.uf);
                 $("#ibge").val(dados.ibge);
               } //end if.
               else {
                 //CEP pesquisado não foi encontrado.
                 limpa_formulário_cep();
                 alert("CEP não encontrado.");
               }
             });
           } //end if.
           else {
             //cep é inválido.
             limpa_formulário_cep();
             alert("Formato de CEP inválido.");
           }
         } //end if.
         else {
           //cep sem valor, limpa formulário.
           limpa_formulário_cep();
         }
       });
     });
   </script>

<script>
     $(document).ready(function() {

       function limpa_formulário_cep() {
         // Limpa valores do formulário de cep.
         $("#rua2").val("");
         $("#bairro2").val("");
         $("#cidade2").val("");
         $("#uf2").val("");
         $("#ibge2").val("");
       }

       //Quando o campo cep perde o foco.
       $("#cep2").blur(function() {

         //Nova variável "cep" somente com dígitos.
         var cep = $(this).val().replace(/\D/g, '');

         //Verifica se campo cep possui valor informado.
         if (cep != "") {

           //Expressão regular para validar o CEP.
           var validacep = /^[0-9]{8}$/;

           //Valida o formato do CEP.
           if (validacep.test(cep)) {

             //Preenche os campos com "..." enquanto consulta webservice.
             $("#rua2").val("...");
             $("#bairro2").val("...");
             $("#cidade2").val("...");
             $("#uf2").val("...");
             $("#ibge2").val("...");

             //Consulta o webservice viacep.com.br/
             $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

               if (!("erro" in dados)) {
                 //Atualiza os campos com os valores da consulta.
                 $("#rua2").val(dados.logradouro);
                 $("#bairro2").val(dados.bairro);
                 $("#cidade2").val(dados.localidade);
                 $("#uf2").val(dados.uf);
                 $("#ibge2").val(dados.ibge);
               } //end if.
               else {
                 //CEP pesquisado não foi encontrado.
                 limpa_formulário_cep();
                 alert("CEP não encontrado.");
               }
             });
           } //end if.
           else {
             //cep é inválido.
             limpa_formulário_cep();
             alert("Formato de CEP inválido.");
           }
         } //end if.
         else {
           //cep sem valor, limpa formulário.
           limpa_formulário_cep();
         }
       });
     });
   </script>


   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   
   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
   </body>

   </html>