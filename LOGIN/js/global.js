const popupWindow = document.getElementById('error-window');

if (popupWindow) {
   document.body.style.overflow = 'hidden';
   document.documentElement.style.overflow = 'hidden';
   
   popupWindow.querySelector('button').onclick = () => {
      history.back()

      document.body.style.overflow = 'auto';
      document.documentElement.style.overflow = 'auto';
   }
}