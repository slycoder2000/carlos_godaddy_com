@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
    <strong>Medical</strong>
        <ul>
        <li> Seizure record</li>
        <table border="1" class="col-12 col-md-6">
            <tr>
            <th>2020</th>
            <th>2019</th>
            <th>2018</th>
            </tr>
            <tr>
            <td valign="top">
            Wed, 01/15<br/>
            Sat, 01/25<br/>
            Sat, 02/01<br/>
            Fri, 03/13<br/>
            Mon, 04/06<br/>
            Fri, 04/17<br/>
            Fri, 05/22 @ 1am<br/>
            Tue, 06/02 @ 10:30pm<br/>
            Tue, 07/07 @ 8:30pm<br/>
            Sat, 07/18 @ @ 12:15am - 12:30am <a href="/family/lisa/lisa_seizure_2020_0718">[video]</a><br/>
            Tue, 07/28 @ 8:30am<br/>
            Sat, 08/08 @ 3:15pm - 3:40pm<br/>
            
            </td>
            <td valign="top">
            
            
            Sat, 03/30<br/>
            Thu, 08/01<br/>
            Sun, 08/18<br/>
            Tue, 09/03<br/>
            Wed, 09/18<br/>
            Fri, 10/18 @ 12:00am<br/>
            First time Lisa got stiff<br/>
            different than other times.<br/>
            Sat, 11/30 @ 7:15pm - 7:30pm<br/>
            Sat, 12/07<br/>            
            </td>
            <td valign="top">
            Thu, 06/07<br/>
             </td>
            </tr>
        </table>
        </ul>
    </article>
</section>
@endsection


