const btnSesion = document.getElementById('btnSesion');
const user = document.querySelector('#userInput');
const password = document.querySelector('#passwordInput');
const enter = document.getElementById('enter');
const btnContenido = document.getElementById('btnContenido');
const btnCerrar = document.getElementById('btnCerrar');

btnSesion.addEventListener('click', function(){openmodal()});
user.addEventListener('blur', function(){marca(user)});
password.addEventListener('blur', function(){marca(password)});
document.addEventListener('keyup',function(){comprobando()});
btnContenido.addEventListener('click', function(){redirect()});

function openmodal()
{
    const modal = document.querySelector('.modal');
    modal.style.display = 'flex';
}


function closeModal()
{
    const modal = document.querySelector('.modal');
    modal.style.display = 'none';
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


function comprobando()
{
    if(user.value == '' || password.value == '')
        {
            enter.disabled = true;
            enter.style.backgroundColor = '#9b9b9b';
            enter.addEventListener('mouseover', btnEnter.style.cursor = 'not-allowed');
        }
    else
    {
        enter.disabled = false;
        enter.style.backgroundColor = 'black';
        enter.addEventListener('mouseover', enter.style.cursor = 'pointer');
    }
}


function redirect()
{
    window.location.href="contenido.php";
}



