const PopUp = {
    exibeMensagem: (status, msg) => {

        if(status === 'success')
           // M.toast({ html: msg, classes: 'green', displayLength: 2000 });
var toastHTML = '<span><b style=color:green>Sucesso </b> Atualizado com Sucesso</span>';
  M.toast({html: toastHTML, classes: 'rounded'});
        if(status === 'error') 
            M.toast({ html: msg, classes: 'red', displayLength: 2000 });

    }
}
export default PopUp;