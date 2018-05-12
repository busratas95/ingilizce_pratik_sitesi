<div class="search-container">
    <form id="search_form" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" placeholder="Turkish or English" name="search_term" id="search_term" class="form-control"
                   style="width: 350px">
        </div>
        <div class="dropdown form-group mx-sm-3">
            <button class="btn btn-light mb-2" type="button" id="search_filter" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                TR-EN
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">TR-EN</a>
                <a class="dropdown-item" href="#">EN-TR</a>
            </div>
        </div>
        <button id="search_submit" type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>

<div class="sonuctablosu">
    <table class="table" id="sonuclar">
        <thead class="thead-light">
        </thead>
    </table>
</div>