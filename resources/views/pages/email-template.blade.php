<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div>
                  <p>From:{{ $dataReceived['email'] }}</p>
                  <h3>Title:{{ $dataReceived['subject'] }}</h3>
                  <p>Body:{{ $dataReceived['content'] }}</p>
              </div>
            </div>
        </div>
    </div>
</div>
