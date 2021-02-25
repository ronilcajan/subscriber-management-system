<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?= $title ?></h3>
                <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                <div class="row">
                    <div class="col-md-8 col-sm-12 text-left">
                        <button class="btn btn-primary waves-effect waves-light">Download Excel</button>
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        <form role="search" class="app-search w-100">
                            <i class="icon-magnifier"></i>
                            <input type="text" placeholder="Search..." class="form-control w-100">
                        </form>
                    </div>
                </div>
                <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                    <thead>
                        <tr>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Movie Title</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Rank</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Year</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">
                                <abbr title="Rotten Tomato Rating">Rating</abbr>
                            </th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Gross</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Avatar</a></td>
                            <td>1</td>
                            <td>2009</td>
                            <td>83%</td>
                            <td>$2.7B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Titanic</a></td>
                            <td>2</td>
                            <td>1997</td>
                            <td>88%</td>
                            <td>$2.1B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">The Avengers</a></td>
                            <td>3</td>
                            <td>2012</td>
                            <td>92%</td>
                            <td>$1.5B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Harry Potter and the Deathly Hallows—Part 2</a></td>
                            <td>4</td>
                            <td>2011</td>
                            <td>96%</td>
                            <td>$1.3B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Frozen</a></td>
                            <td>5</td>
                            <td>2013</td>
                            <td>89%</td>
                            <td>$1.2B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Iron Man 3</a></td>
                            <td>6</td>
                            <td>2013</td>
                            <td>78%</td>
                            <td>$1.2B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Transformers: Dark of the Moon</a></td>
                            <td>7</td>
                            <td>2011</td>
                            <td>36%</td>
                            <td>$1.1B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">The Lord of the Rings: The Return of the King</a></td>
                            <td>8</td>
                            <td>2003</td>
                            <td>95%</td>
                            <td>$1.1B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Skyfall</a></td>
                            <td>9</td>
                            <td>2012</td>
                            <td>92%</td>
                            <td>$1.1B</td>
                        </tr>
                        <tr>
                            <td class="title"><a href="javascript:void(0)">Transformers: Age of Extinction</a></td>
                            <td>10</td>
                            <td>2014</td>
                            <td>18%</td>
                            <td>$1.0B</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>