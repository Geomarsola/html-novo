<!DOCTYPE html>
<html>
    <head>
        <title>Posto Savegnago</title>
        <meta name="description" content="Um quiz interativo para testar seus conhecimentos">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Lista de Produtos</h1>
        </header>
        <main>
            <section>
                <h2>Segue a lista abaixo e selecione o produto que você vendeu</h2>
                <p>Esse site é para você gerenciar seus produtos vendidos e fazer o lançamento dos mesmos.</p>
            </section>

            <!--Produto 1-->
            <section>
                <h2>ADITIVO PARA TANQUE BARDALH</h2>
                <form>
                    <input type="checkbox" id="p1a" name="produtos" value="CLEAN GAS">
                    <label for="p1a">CLEAN GAS</label><br>
                    <input type="number" name="qtd_clean_gas" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p2b" name="produtos" value="MAX DIESEL">
                    <label for="p2b">MAX DIESEL</label><br>
                    <input type="number" name="qtd_max_diesel" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p3c" name="produtos" value="FLEX">
                    <label for="p3c">FLEX</label><br>
                    <input type="number" name="qtd_flex" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p4d" name="produtos" value="MAX POWER">
                    <label for="p4d">MAX POWER</label><br>
                    <input type="number" name="qtd_max_power" min="0" placeholder="Quantidade"><br><br>
                </form>
            </section>

            <!--Produto 2-->
            <section>
                <h2>FLUIDO PARA RADIADORES BARDALH</h2>
                <form>
                    <input type="checkbox" id="p5a" name="produtos" value="Aditivo de Radiador Rosa">
                    <label for="p5a">FLUIDO PARA RADIADORES ROSA</label><br>
                    <input type="number" name="qtd_radiador_rosa" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p6b" name="produtos" value="Aditivo de Radiador Verde">
                    <label for="p6b">FLUIDO PARA RADIADORES VERDE</label><br>
                    <input type="number" name="qtd_radiador_verde" min="0" placeholder="Quantidade"><br><br>
                </form>
            </section>

            <!--Produto 3-->
            <section>
                <h2>ÓLEO LUBRIFICANTE LUBRAX</h2>
                <form>
                    <input type="checkbox" id="p7a" name="produtos" value="OLEO 15W40">
                    <label for="p7a">ÓLEO 15W40</label><br>
                    <input type="number" name="qtd_15w40" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p8b" name="produtos" value="OLEO 25W50">
                    <label for="p8b">ÓLEO 25W50</label><br>
                    <input type="number" name="qtd_25w50" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p9c" name="produtos" value="OLEO 5W30">
                    <label for="p9c">ÓLEO 5W30</label><br>
                    <input type="number" name="qtd_5w30" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p10d" name="produtos" value="OLEO 10W30">
                    <label for="p10d">ÓLEO 10W30</label><br>
                    <input type="number" name="qtd_10w30" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p11e" name="produtos" value="OLEO 0W30">
                    <label for="p11e">ÓLEO 0W30</label><br>
                    <input type="number" name="qtd_0w30" min="0" placeholder="Quantidade"><br><br>
                </form>
            </section>

            <!--Produto 4-->
            <section>
                <h2>ADITIVO PARA TANQUE STP</h2>
                <form>
                    <input type="checkbox" id="p12a" name="produtos" value="STP FLEX">
                    <label for="p12a">STP FLEX</label><br>
                    <input type="number" name="qtd_stp_flex" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p13b" name="produtos" value="STP MOTOR DIESEL">
                    <label for="p13b">STP MOTOR DIESEL</label><br>
                    <input type="number" name="qtd_stp_diesel" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p14c" name="produtos" value="STP FUEL INJECTOR CLEANER">
                    <label for="p14c">STP FUEL INJECTOR CLEANER</label><br>
                    <input type="number" name="qtd_stp_injetor" min="0" placeholder="Quantidade"><br><br>

                    <input type="checkbox" id="p15d" name="produtos" value="STP OCTANE BOOSTER">
                    <label for="p15d">STP OCTANE BOOSTER</label><br>
                    <input type="number" name="qtd_stp_octane" min="0" placeholder="Quantidade"><br><br>
                </form>
            </section>

            <!--Produto 5-->
            <section>
                <h2>GALÃO DE COMBUSTÍVEL DE 5L</h2>
                <form>
                    <input type="checkbox" id="p16a" name="produtos" value="GALÃO DE 5L">
                    <label for="p16a">GALÃO DE 5L</label><br>
                    <input type="number" name="qtd_galao" min="0" placeholder="Quantidade"><br><br>
                </form> 
            </section>

            <section>
                <form>
                    <fieldset>
                        <button type="submit" onclick="alert('Produtos enviados com sucesso!')">Enviar os Produtos</button>
                    </fieldset>
                </form>
            </section>  
        </main>
        <footer>
            <p class="paragrafo-footer">&copy; AUTO POSTO SAVEGNAGO. Todos os direitos reservados</p>
        </footer>
    </body>
</html>