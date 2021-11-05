<!-- About category-->
<div class="col-lg-3">
    <div class="card rounded-0 border-0 bg-light mb-4 py-lg-4">
        <div class="card-body text-center link">
            <h2 class="cardtitle h3 mb-3">About me</h2><img class="circle mb-3" src="public/img/logo.png" alt="...">
            <p class="text-small">Basé à Paris. Amateur de défis. Etudie actuellement "Développeur d'applications - PHP/Symfony" sur Openclassrooms. </p>
            <a href="mailto:pelgrims.chenchingyi@gmail.com">pelgrim.chenchingyi@gmail.com</a>
            <ul class="list-inline small mb-0 text-dark">
                <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f" ></i></a></li>
                <li class="list-inline-item"><a href="#"target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" ></i></a></li>
                <li class="list-inline-item"><a href="https://www.linkedin.com/in/ching-yi-chen-63120322/"target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin" ></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/JENNYPCHEN"target="_blank" rel="noopener noreferrer" ><i class="fab fa-github"></i></a></li>
            </ul>
            <a href="public/doc/CV_2021-Ching Yi_Chen_Pelgrims.pdf" target="_blank" rel="noopener noreferrer"><i class="fas fa-portrait" title="download my CV"></i></a>
        </div>
    </div>
    <!--seachbox-->
    <form class="d-flex pt-2 pb-2" action ="index.php?action=search" methods="get">
        <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search" value="<?=filter_var($keyword, FILTER_SANITIZE_STRING); ?>">
        <button class="btn button" type="submit">Search</button>
    </form>
</div>
</div>