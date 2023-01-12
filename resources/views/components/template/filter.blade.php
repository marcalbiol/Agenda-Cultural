@vite(['resources/css/template/filter.css','resources/js/template/filter.js']);

<div class="d-flex align-items-center align-content-center page-wrapper bg-color-1 p-t-395 p-b-120">
    <div class="wrapper wrapper--w1070">
        <div class="card card-7">
            <div class="card-body">
                <form class="form" method="POST" action="/search">
                    @csrf

                    <div class="input-group input--large">
                        <label class="label">Denominaci:</label>
                        <input class="input--style-1" type="text" id="denominaci" placeholder="Exposició" name="denominaci">
                    </div>

                    <div class="input-group input--medium">
                        <label class="label">Data inici:</label>
                        <input class="input--style-1" type="date" id="data_inici" placeholder="mm/dd/yyyy" name="data_inici">
                    </div>

                    <div class="input-group input--medium">
                        <label class="label">Data fi:</label>
                        <input class="input--style-1" type="date" id="data_fi" placeholder="mm/dd/yyyy" name="data_fi">
                    </div>

                    <button class="btn-submit" type="submit" disabled>search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- This templates was made by Colorlib (https://colorlib.com) -->
