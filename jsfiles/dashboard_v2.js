function menuOpener(e)
{
    let menu = document.querySelector('.menu');
    let grid = document.querySelector('.grid');
    let btn = document.querySelector('.btn');
    if(menu.classList.contains('moveOM'))
    {
        menu.classList.add('moveIM');
        menu.classList.remove('moveOM');
        menu.animate(
            [
              { transform: 'translateX(-20vw)' }, 
              { transform: 'translateX(0vw)' }    
            ],
            {
              duration: 1000, 
              delay: 500,     
            }
          ).onfinish = () => {
            menu.style.transform = 'translateX(0vw)';
            btn.innerText="CLOSE";
        }; 
    }
    else if(menu.classList.contains('moveIM'))
    {
        menu.classList.remove('moveIM');
        menu.classList.add('moveOM');
        menu.animate(
            [
              { transform: 'translateX(0vw)' }, 
              { transform: 'translateX(-20vw)' }    
            ],
            {
              duration: 1000, 
              delay: 500,     
            }
          ).onfinish = () => {
            menu.style.transform = 'translateX(-20vw)';
            btn.innerText="MENU";
        };
    }
    if(grid.classList.contains('moveOG'))
        {
            grid.classList.remove('moveOG');
            grid.classList.add('moveIG');
            grid.animate(
                [
                  { transform: 'translateX(-10vw)' }, 
                  { transform: 'translateX(0vw)' }    
                ],
                {
                  duration: 1000, 
                  delay: 500,     
                }
              ).onfinish = () => {
                grid.style.transform = 'translateX(0vw)';
                btn.innerText="CLOSE";
            };
        }
        else if(grid.classList.contains('moveIG'))
        {
            grid.classList.remove('moveIG');
            grid.classList.add('moveOG');
            grid.animate(
                [
                  { transform: 'translateX(0vw)' }, 
                  { transform: 'translateX(-10vw)' }    
                ],
                {
                  duration: 1000, 
                  delay: 500,     
                }
              ).onfinish = () => {
                grid.style.transform = 'translateX(-10vw)';
                btn.innerText="MENU";
            };
        }
}
let btn = document.querySelector(".btn");
btn.addEventListener("click", menuOpener);

