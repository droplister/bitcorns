@extends('layouts.app')

@section('title', 'Initial Crops Offering')

@section('content')
<div class="container">

    <h1 class="display-4 mt-5 mb-2">
        Initial Crops Offering
    </h1>

    <p class="lead">Starting April 1st, <a href="https://xchain.io/asset/BITCORN" target="_blank">BITCORN:XCP</a> will be rewarded to addresses owning <a href="https://xchain.io/asset/CROPS" target="_blank">CROPS:XCP</a>, as part of the first-ever idle game on the blockchain.</p>

    <img src="{{ asset('img/bitcorn-harvest.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-2" />

    <h2 class="display-4 mt-4">
        About Bitcorns.com
    </h2>

    <p class="lead">Bitcorns.com is an idle game of accumulation, similar to AdVenture Capitalist, where the only objective is to accumulate more BITCORN. Practically, the way that works is, four times per year, farmers harvest BITCORN proportional to the number of CROPS they own.</p>
    <p class="lead">And that's it. That's the game! That and <em>blockchain technology</em>.</p>

    <h2 class="display-4 mt-4">
        Sneak Peek Preview
    </h2>

    <h2 class=" mt-4">
        Leaderboard &amp; Profile
    </h2>

    <div class="row">

        <div class="col-12 col-sm-6 mt-3 mb-4">
            <img src="{{ asset('img/leaderboard.png') }}" class="img-thumbnail img-fluid" />
        </div>

        <div class="col-12 col-sm-6 mt-3 mb-4">
            <img src="{{ asset('img/profilepage.png') }}" class="img-thumbnail img-fluid" />
        </div>

    </div>

    <h2 class=" mt-4">
        Available Farm Scenes
    </h2>

    <div class="row">

        @foreach(range(1,12) as $index)

            <div class="col-6 col-sm-4 mt-3 mb-4">
                <img src="{{ asset('img/farm-' . $index . '.jpg') }}" class="img-thumbnail img-fluid" />
            </div>

            @if($loop->iteration % 2 === 0 && ! $loop->last)
                <div class="w-100 d-block d-sm-none"></div>
            @endif

            @if($loop->iteration % 3 === 0 && ! $loop->last)
                <div class="w-100 d-none d-sm-block"></div>
            @endif

        @endforeach
    </div>

    <h2 class="display-4 mt-4">
        Bitcorners' Almanac
    </h2>

    <p class="lead">The yield of CROPS can be calculated precisely out to Year 2022.</p>

    <div class="table-responsive">
        <table class="table mt-2 mb-4">
            <thead>
                <tr>
                    <th scope="col">BITCORN <small>Per 100 CROPS</small></th>
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
                    <td>2,625,000</td>
                    <td>2,625,000</td>
                    <td>2,625,000</td>
                </tr>
                <tr>
                    <th scope="row">2019</th>
                    <td>2,625,000</td>
                    <td>1,312,500</td>
                    <td>1,312,500</td>
                    <td>1,312,500</td>
                </tr>
                <tr>
                    <th scope="row">2020</th>
                    <td>1,312,500</td>
                    <td>787,500</td>
                    <td>787,500</td>
                    <td>787,500</td>
                </tr>
                <tr>
                    <th scope="row">2021</th>
                    <td>787,500</td>
                    <td>525,000</td>
                    <td>525,000</td>
                    <td>525,000</td>
                </tr>
                <tr>
                    <th scope="row">2022</th>
                    <td>525,000</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col">BITCORN <small>Per 10 CROPS</small></th>
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
                    <td>262,500</td>
                    <td>262,500</td>
                    <td>262,500</td>
                </tr>
                <tr>
                    <th scope="row">2019</th>
                    <td>262,500</td>
                    <td>131,250</td>
                    <td>131,250</td>
                    <td>131,250</td>
                </tr>
                <tr>
                    <th scope="row">2020</th>
                    <td>131,250</td>
                    <td>78,750</td>
                    <td>78,750</td>
                    <td>78,750</td>
                </tr>
                <tr>
                    <th scope="row">2021</th>
                    <td>78,750</td>
                    <td>52,500</td>
                    <td>52,500</td>
                    <td>52,500</td>
                </tr>
                <tr>
                    <th scope="row">2022</th>
                    <td>52,500</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col">BITCORN <small>Per 1 CROPS</small></th>
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
                    <td>5,250</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col">BITCORN <small>Per 0.1 CROPS</small></th>
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
                    <td>2,625</td>
                    <td>2,625</td>
                    <td>2,625</td>
                </tr>
                <tr>
                    <th scope="row">2019</th>
                    <td>2,625</td>
                    <td>1,312</td>
                    <td>1,312</td>
                    <td>1,312</td>
                </tr>
                <tr>
                    <th scope="row">2020</th>
                    <td>1,312</td>
                    <td>787</td>
                    <td>787</td>
                    <td>787</td>
                </tr>
                <tr>
                    <th scope="row">2021</th>
                    <td>787</td>
                    <td>525</td>
                    <td>525</td>
                    <td>525</td>
                </tr>
                <tr>
                    <th scope="row">2022</th>
                    <td>525</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col">BITCORN <small>Per 0.01 CROPS</small></th>
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
                    <td>262</td>
                    <td>262</td>
                    <td>262</td>
                </tr>
                <tr>
                    <th scope="row">2019</th>
                    <td>262</td>
                    <td>131</td>
                    <td>131</td>
                    <td>131</td>
                </tr>
                <tr>
                    <th scope="row">2020</th>
                    <td>131</td>
                    <td>78</td>
                    <td>78</td>
                    <td>78</td>
                </tr>
                <tr>
                    <th scope="row">2021</th>
                    <td>78</td>
                    <td>52</td>
                    <td>52</td>
                    <td>52</td>
                </tr>
                <tr>
                    <th scope="row">2022</th>
                    <td>52</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="text-center text-muted">It's not recommended playing with fewer than 0.01 CROPS.</p>

    <h2 class="display-4 mt-5">
        Acquiring CROPS
    </h2>

    <h2 class="mt-4">
        February 1<sup>st</sup> Initial Crops Offering 
    </h2>

    <p class="lead">The best way to establish a Bitcorns.com farm is by buying CROPS during our Initial Crops Offering. On February 1st, 2018, CROPS will be made available for purchase on the Counterparty DEX for 20 XCP each.</p>
    <p class="lead">In order to participate, it's necessary to have XCP, which can be purchased on Bittrex or Poloniex, enough BTC to confirm a 220 byte tx, and a Counterparty enabled wallet with DEX support, like Counterwallet or IndieSquare.</p>

    <h2 class="mt-4">
        Where are BITCORN Tokens Sold?
    </h2>

    <p class="lead">BITCORN are not for sale. They can only be earned by patiently harvesting CROPS and are only useful on the Bitcorns.com website. Which may cause an inquiring mind to wonder, "Why farm CROPS for BITCORN, at all?"</p>
    <p class="lead">Bitcorns.com is built like any other idle game. You play for fun. You play for points. And the points are the point. Participants will learn more about Counterparty, indirectly support its development, and have immutable bragging rights.</p>

    <h2 class="display-4 mt-4">
        Technical Details
    </h2>

    <h2 class="mt-4">
        The Technology Behind Bitcorn
    </h2>

    <p class="lead">Using a technology, known as Counterparty (XCP), we have created BITCORN and CROPS as gaming tokens on the Bitcoin blockchain. BITCORN is a cryptographically modified organism (CMO) and CROPS are arable farmland on the blockchain (AFotB).</p>
    <p class="lead">Counterparty, by embedding state changes into the Bitcoin blockchain and computing them off-chain, allows Bitcorns.com to distribute BITCORN to all CROPS farmers with just one bitcoin transaction per harvest.</p>

    <h2 class="mt-4">
        Mechanics of Bitcorn Harvesting
    </h2>

    <p class="lead">Each quarter, starting April 1, 2018, and continuing until January 1, 2022, BITCORN will be harvested and rewarded to farms owning CROPS. The yield of CROPS will be reduced every year until all BITCORN are harvested. There will only ever be 21 million BITCORN.</p>
    <p class="lead">Surprisingly, Bitcorns.com will only need to perform 17 bitcoin transactions&ndash;in total&ndash;to execute the Initial CROPS Offering and all four years of BITCORN harvests. This is made possible by Counterparty's distribution and DEX features.</p>

</div>
@endsection