function menuOpener(e)
{
    let menu = document.querySelector('.menu');
    let grid = document.querySelector('.grid');
    let btn = document.querySelector('.btn');
    if(menu.classList.contains('moveOM'))
    {
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
            menu.classList.add('moveIM');
            menu.classList.remove('moveOM');
            menu.style.transform = 'translateX(0vw)';
        }; 
    }
    else if(menu.classList.contains('moveIM'))
    {
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
            menu.classList.remove('moveIM');
            menu.classList.add('moveOM');
            menu.style.transform = 'translateX(-20vw)';
        };
    }
    if(grid.classList.contains('moveOG'))
        {
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
                grid.classList.remove('moveOG');
                grid.classList.add('moveIG');
                grid.style.transform = 'translateX(0vw)';
            };
        }
        else if(grid.classList.contains('moveIG'))
        {
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
                grid.classList.remove('moveIG');
                grid.classList.add('moveOG');
                grid.style.transform = 'translateX(-10vw)';
            };
        }
}
let btn = document.querySelector(".btn");
btn.addEventListener("click", menuOpener);