<!DOCTYPE html>
<html>
<head>

    @extends('front-end.css')
    <title>Laravel</title>


</head>
<body>
<div class="container">

    <div class="content">
        {!! Form::open(array('url' => 'store')) !!}
        {!! Form::label('Product Name', 'Product Name') !!}
        {!!  Form::text('ProductName',null, array('class' => 'form-control')) !!}
        {!! Form::label('Quantity', 'Quantity') !!}
        {!!  Form::text('QuantityInStock',null, array('class' => 'form-control'))  !!}
        {!! Form::label('Price', 'Price') !!}
        {!!  Form::text('PricePerItem',null, array('class' => 'form-control'),null,['placeholder'=>'PricePerItem'])  !!}
        {!! Form::submit('Submit',array('class' => 'btn btn-primary btn-default-property')) !!}
        {!! Form::close() !!}
    </div>
    <div class="content">
        <table class="table">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>QuantityInStock</th>
                <th>PricePerItem</th>
                <th>Datetime submitted</th>
                <th>Total value number</th>

            </tr>
            </thead>
            <tbody>
            <?php $global =0;?>
            @foreach($result as $item)
                <tr>
                    <td>{{$item->ProductName}}</td>
                    <td>{{$item->QuantityInStock}}</td>
                    <td>{{$item->PricePerItem}}</td>
                    <td>{{$item->date}}</td>
                    <?php $getResult = $item->PricePerItem*$item->QuantityInStock; $global += $getResult;?>
                    <td>{{$getResult}}</td>

                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>{{'TOTAL'}}</td>
                <td>
                    {{$global}}
                </td>
            </tr>
            </tbody>
        </table>
        <a href="/create" class="btn btn-primary">Create</a>
    </div>

</div>
</body>
</html>
