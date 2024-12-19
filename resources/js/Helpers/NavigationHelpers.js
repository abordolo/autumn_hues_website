const popRoute = () => {
  window.history.back();
};

// will try this later
// https://stackoverflow.com/questions/25639290/windows-history-back-location-reload-jquery
function GoBackWithRefresh(event) {
  if ('referrer' in document) {
    window.location = document.referrer;
    /* OR */
    //location.replace(document.referrer);
  } else {
    window.history.back();
  }
}

export { popRoute };
