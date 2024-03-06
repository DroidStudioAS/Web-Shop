<!doctype html>
<html lang="en">
<div class="app-footer">
    Copyright &copy;
</div>
<script>
    let currentUrl = window.location.href;
    console.log(currentUrl);

    if(currentUrl.includes("contact")){
        let footer = document.querySelector(".app-footer");
        footer.className="contact-footer"

    }
</script>
</html>
