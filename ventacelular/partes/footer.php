</div>
<script>
    let links = document.querySelectorAll('.sidebar-links > div');
    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click',(e)=>{
            for (let x = 0; x < links.length; x++) {
                const ele = links[x];
                ele.classList.remove('selected');
            }
            links[i].classList.add('selected');
        })
    }
</script>