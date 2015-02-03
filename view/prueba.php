<html><head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico">

        <title>DataTables example</title>
        <style type="text/css" title="currentStyle">
            @import "/css/demos.css";
        </style>
        <script type="text/javascript" language="javascript" src="../js/jquery/jquery-2.0.3.js"></script>
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            var oTable;
            var asInitVals = new Array();

            $(document).ready(function() {
                oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    }
                });

                $("tfoot input").keyup(function() {
                    /* Filter on the column (the index) of this element */
                    oTable.fnFilter(this.value, $("tfoot input").index(this));
                });



                /*
                 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
                 * the footer
                 */
                $("tfoot input").each(function(i) {
                    asInitVals[i] = this.value;
                });

                $("tfoot input").focus(function() {
                    if (this.className == "search_init")
                    {
                        this.className = "";
                        this.value = "";
                    }
                });

                $("tfoot input").blur(function(i) {
                    if (this.value == "")
                    {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
    </head>
    <body id="dt_example">
        <div id="container">
            <div class="full_width big">
                <i>DataTables</i> individual column filtering example
            </div>

            <h1>Preamble</h1>
            <p>The filtering functionality that is provided by <i>DataTables</i> is very useful for quickly search through the information in the table - however the search is global, and you (or the end user) may wish to filter only on a particular column of data. To met this need the <i>DataTables</i> <b>fnFilter()</b> API function allow you to specify a column to limit to search to. Note that this works in-combination with the global search filter!</p>
            <p>The example below shows a table which has a text input box for each column in the footer element of the table. This allows the data in each column to be quickly filtered upon by the end user.</p>

            <h1>Live example</h1>
            <div id="demo">

                <div class="dataTables_wrapper" id="example_wrapper">
                    <div id="example_length" class="dataTables_length">Show <select size="1" name="example_length"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</div>
                    <div id="example_filter" class="dataTables_filter">Search all columns: <input type="text"></div><div id="example_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div><table cellpadding="0" cellspacing="0" border="0" class="display" id="example" style="width: 800px;">
                        <thead><tr><th class="sorting_asc" style="width: 158px;">Rendering engine</th><th class="sorting" style="width: 165px;">Browser</th><th class="sorting" style="width: 160px;">Platform(s)</th><th class="sorting" style="width: 158px;">Engine version</th><th class="sorting" style="width: 159px;">CSS grade</th></tr></thead>
                        <tbody><tr class="odd">
                                <td valign="top">Webkit</td>
                                <td valign="top">S60</td>
                                <td valign="top">S60</td>
                                <td valign="top" class="center">413</td>
                                <td valign="top" class="center">A</td></tr>


                            <tr class="even"><td valign="top">Webkit</td><td valign="top">iPod Touch / iPhone</td><td valign="top">iPod</td><td valign="top" class="center">420.1</td><td valign="top" class="center">A</td></tr><tr class="odd"><td valign="top">Webkit</td><td valign="top">OmniWeb 5.5</td><td valign="top">OSX.4+</td><td valign="top" class="center">420</td><td valign="top" class="center">A</td></tr><tr class="even"><td valign="top">Webkit</td><td valign="top">Safari 3.0</td><td valign="top">OSX.4+</td><td valign="top" class="center">522.1</td><td valign="top" class="center">A</td></tr><tr class="odd"><td valign="top">Webkit</td><td valign="top">Safari 1.3</td><td valign="top">OSX.3</td><td valign="top" class="center">312.8 iPod</td><td valign="top" class="center">A</td></tr><tr class="even"><td valign="top">Webkit</td><td valign="top">Safari 1.2</td><td valign="top">OSX.3</td><td valign="top" class="center">125.5</td><td valign="top" class="center">A</td></tr><tr class="odd"><td valign="top">Webkit</td><td valign="top">Safari 2.0</td><td valign="top">OSX.4+</td><td valign="top" class="center">419.3</td><td valign="top" class="center">A</td></tr></tbody>
                        <tfoot>
                            <tr>
                                <th><input type="text" name="search_engine" value="Search engines" class="search_init"></th>
                                <th><input type="text" name="search_browser" value="Search browsers" class="search_init"></th>
                                <th><input type="text" name="search_platform" value="Search platforms" class="search_init"></th>
                                <th><input type="text" name="search_version" value="Search versions" class="search_init"></th>
                                <th><input type="text" name="search_grade" value="Search grades" class="search_init"></th>
                            </tr>
                        </tfoot>
                    </table><div id="example_info" class="dataTables_info">Showing 51 to 57 of 57 entries </div><div class="dataTables_paginate" id="example_paginate"><div id="example_previous" class="paginate_enabled_previous"></div><div id="example_next" class="paginate_disabled_next"></div></div></div>
            </div>
            <div class="spacer"></div>


            <h1>Initialisation code</h1>
            <pre>var oTable;</pre>

            <p>Note that in the above code, the support functions are provided to ensure that the end user knows what data is being filtered upon. <b>fnFilter()</b> is the function of primary import here.</p>


            <h1>Other examples</h1>
            <h2>Basic initialisation</h2>
            <ul>
                <li><a href="example_zero_config.html">Zero configuration</a></li>
                <li><a href="example_filter_only.html">Feature enablement</a></li>
                <li><a href="example_table_sorting.html">Sorting data</a></li>
                <li><a href="example_multi_col_sort.html">Multi-column sorting</a></li>
                <li><a href="example_multiple_tables.html">Multiple tables</a></li>
                <li><a href="example_hidden_columns.html">Hidden columns</a></li>
                <li><a href="example_language.html">Change language information (internationalisation)</a></li>
                <li><a href="example_dom.html">DOM positioning</a></li>
                <li><a href="example_alt_pagination.html">Alternative pagination styles</a></li>
            </ul>

            <h2>Advanced initialisation</h2>
            <ul>
                <li><a href="example_column_render.html">Column rendering</a></li>
                <li><a href="example_html_sort.html">Sorting without HTML tags</a></li>
                <li><a href="example_row_callback.html">Row callback</a></li>
                <li><a href="example_footer_callback.html">Footer callback</a></li>
                <li><a href="example_language_file.html">Change language information from a file (internationalisation)</a></li>
            </ul>

            <h2>API</h2>
            <ul>
                <li><a href="example_add_row.html">Dynamically add a new row</a></li>
                <li><a href="example_dynamic_creation.html">Dynamically create a table</a></li>
                <li><a href="example_multi_filter.html">Individual column filtering</a></li>
                <li><a href="example_select_row.html">User selectable rows</a></li>
            </ul>


            <p>Please refer to the <a href="http://www.sprymedia.co.uk/article/DataTables"><i>DataTables</i> documentation</a> for full information about it's API properties and methods.</p>


            <div id="footer" style="text-align:center;">
                <span style="font-size:10px;">
                    DataTables © Allan Jardine 2007-2008.<br>
                    Information in the table © <a href="http://www.u4eatech.com">U4EA Technologies</a> 2007-2008.</span>
            </div>
        </div>

    </body></html>