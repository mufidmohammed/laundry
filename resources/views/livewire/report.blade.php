<div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card p-3">

                        <div class="card-heading ml-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="" class="btn btn-primary">export to excel</a>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group">
                                        <label for="start">Start</label>
                                        <input type="date" name="start" wire:model="startDate">
                                    </div>
                                    <div class="form-group mx-4">
                                        <label for="end">End</label>
                                        <input type="date" name="end" wire:model="endDate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id='table-transaction' class="table table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name<sup>(M/F)</sup></th>
                                            <th>Employee Name<sup>(M/F)</sup></th>
                                            <th>Laundry Type</th>
                                            <th>Weight</th>
                                            <th>Total</th>
                                            <th>Order Date</th>
                                            <th>Finish Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->customer->name }}</td>
                                            <td>{{ $transaction->employee->name }}</td>
                                            <td>{{ $transaction->laundry->type }}</td>
                                            <td>{{ $transaction->weight }}</td>
                                            <td>Ghc {{ $transaction->laundry->price * $transaction->weight }}</td>
                                            <td>{{ $transaction->order_date }}</td>
                                            <td>{{ $transaction->finish_date ?? '----' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
