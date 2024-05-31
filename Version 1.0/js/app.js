const user = document.getElementById('user');
const pass = document.getElementById('password');
const pass2 = document.getElementById('password2');
const btnEnter = document.getElementById('enter');





user.addEventListener('blur', function(){marca(user)});
pass.addEventListener('blur', function(){marca(pass)});
pass2.addEventListener('blur', function(){marca(pass2)});
document.addEventListener('keyup', function() {verCambios()});



function verCambios()
{
   
    if(user.value == '' || pass.value == '' || pass2 == '')
        {
            btnEnter.disabled = true;
            btnEnter.style.backgroundColor = '#9b9b9b';
            btnEnter.addEventListener('mouseover', btnEnter.style.cursor = 'not-allowed');
        }
    
    

    
        if(user.value!='' && pass.value != '' && pass2.value != '')
            {
                const p = document.createElement(['P']);
                        p.classList.add('alerta');
                        p.textContent = 'Las contrasenas no coinciden';
                if(pass.value != pass2.value)
                    {
                        
                        if( !pass.parentElement.parentElement.children[3])
                        {
                            pass.parentElement.parentElement.appendChild(p);
                            setTimeout(() => {
                                p.remove();
                            }, 3000);
                        }
                        
                        

                    }
                    else
                    {
                         btnEnter.disabled = false;
                         btnEnter.style.backgroundColor = 'black';
                         btnEnter.addEventListener('mouseover', btnEnter.style.cursor = 'pointer');
                         if(pass.parentElement.parentElement.children[3].classList == 'alerta')
                            {
                                console.log('si existe la alerta');
                            }

            }
                    }

        
    
}



 function marca(target)
{

    const span = document.createElement('SPAN');
    span.style.color ='red';
    span.textContent = '- Este campo es obligatorio';

    if(target.value == '')
        {
            target.style.borderColor = 'red';
            if(target.previousElementSibling.style.color != 'red')
                {
                    target.parentElement.insertBefore(span, target);
                }
         
        }
    else
    {
        target.style.borderColor = 'black';
        if(target.previousElementSibling.style.color == 'red')
            {
                target.previousElementSibling.textContent = '';
            }
      
          
    }
    
    
    
           
        
}

