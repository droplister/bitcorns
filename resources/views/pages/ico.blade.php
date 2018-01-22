@extends('layouts.app')

@section('title', 'I.C.O.')

@section('content')
<div class="container">

    <a href="{{ ENV('TELEGRAM') }}" class="btn btn-lg btn-primary mt-2 ml-2 pull-right" target="_blank"> 
        <i class="fa fa-telegram" aria-hidden="true"></i>
    </a>

    <a href="{{ ENV('TWITTER') }}" class="btn btn-lg btn-primary mt-2 pull-right" target="_blank"> 
        <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>

    <h1 class="display-4 mt-5 mb-2">
        I.C.O.
    </h1>

    <p class="lead">As part of the first-ever idle game played on top of the blockchain, addresses farming CROPS regularly harvest BITCORN.</p>

    <img src="{{ asset('img/bitcorn-harvest.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-3" />

    <h2 class="display-4 mt-5">
        Initial Crop Offering
    </h2>

    <table class="table mt-5 mb-5">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">January</th>
                <th scope="col">April</th>
                <th scope="col">July</th>
                <th scope="col">October</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">2018</th>
                <td>---</td>
                <td>26,250</td>
                <td>26,250</td>
                <td>26,250</td>
            </tr>
            <tr>
                <th scope="row">2019</th>
                <td>26,250</td>
                <td>13,125</td>
                <td>13,125</td>
                <td>13,125</td>
            </tr>
            <tr>
                <th scope="row">2020</th>
                <td>13,125</td>
                <td>7,875</td>
                <td>7,875</td>
                <td>7,875</td>
            </tr>
            <tr>
                <th scope="row">2021</th>
                <td>7,875</td>
                <td>5,250</td>
                <td>5,250</td>
                <td>5,250</td>
            </tr>
            <tr>
                <th scope="row">2022</th>
                <td>7,875</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>
            </tr>
        </tbody>
    </table>

            <br />
            <p><img src="http://bitcorns.com/assets/img/cornrise.jpg" class="img-thumbnail" /></p>
            <br />
            <h1 class="cover-heading">Bitcorns.com Preview</h1>
            <p class="lead">The game mechanics will be similar to that of any idle game with incrementally increasing points and bragging rights!</p>
            <br />
            <h2>Leaderboards & Profiles</h2>
            <p>Each bitcoin address (or "farm") will have its own page on Bitcorns.com and be ranked on leaderboards by BITCORN harvested. No other features are planned.</p>
            <p><img src="http://bitcorns.com/assets/img/explorer.jpg" class="img-thumbnail" /></p>
            <br />
            <h2>Farming Begins February 1st</h2>
            <p>100 CROPS will be made available on the Counterparty DEX on Febuary 1st 2018. CROPS are divisible, so you can own a fraction.</p>
            <p><img src="http://bitcorns.com/assets/img/land.jpg" class="img-thumbnail" /></p>
            <br />
            <h2>BITCORN Harvesting Schedule</h2>
            <p>Over five years, 21,000,000 BITCORN will be harvested by 100 CROPS.</p>
            <br />
            <p><img src="http://bitcorns.com/assets/img/chart.png" class="img-thumbnail" /></p>
            <br />
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">BITCORN</th>
                        <th scope="col">Year 1</th>
                        <th scope="col">Year 2</th>
                        <th scope="col">Year 3</th>
                        <th scope="col">Year 4</th>
                        <th scope="col">Year 5</th>
                    </tr>
                    <tr>
                        <th scope="row">Harvested</th>
                        <td>10,500,000</td>
                        <td>5,250,000</td>
                        <td>2,730,000</td>
                        <td>1,260,000</td>
                        <td>1,260,000</td>
                    </tr>
                    <tr>
                        <th scope="row">Sum Total</th>
                        <td>10,500,000</td>
                        <td>15,750,000</td>
                        <td>18,480,000</td>
                        <td>19,740,000</td>
                        <td>21,000,000</td>
                    </tr>
                </table>
            </div>
            <br />
            <hr />
            <br />
            <h1 class="cover-heading">Questions &amp; Answers</h1>
            <p class="lead">If you have any questions or would like to discuss Bitcorns.com further, please join the <a href="https://t.me/bitcorns" target="_blank">Telegram chat</a>.</p>
            <br />
            <h2>How does BITCORN work?</h2>
            <p>BITCORN relies on the Counterparty protocol and its software. Four times per year, BITCORN gets harvested and distributed to farmers of CROPS.</p>
            <p>The amount of BITCORN harvested goes down each year by half, until all 21 million are farmed. Accumulating BITCORN is the only objective.</p>
            <br />
            <h2>How are CROPS farmed?</h2>
            <p>As proof-of-stake is to mining, CROPS are to farming. Simply hold CROPS at your bitcoin address using a Counterparty enabled wallet.</p>
            <p>When BITCORN gets harvested in January, April, July, and October you will receive BITCORN proportional to how many CROPS you own.</p>
            <br />
            <h2>Where is BITCORN sold?</h2>
            <p>No BITCORN has been harvested yet. The first harvest will be April 1st 2018. BITCORN can only be farmed by addresses owning CROPS.</p>
            <br />
            <h2>Where are CROPS for sale?</h2>
            <p>Starting February 1st, CROPS will be available for purchase on Counterparty's Decentralized Exchange. Only XCP will be accepted.</p>
            <br />
            <p class="lead">
                <a href="https://docs.google.com/spreadsheets/d/1C2OgQ_ajNglgv-RZm3aGCLyuqw69prEofJCQS_qXvDs/edit?usp=sharing" class="btn btn-lg btn-primary" target="_blank">BITCORN Farming Calculator &plus;</a>
            </p>
</div>
@endsection