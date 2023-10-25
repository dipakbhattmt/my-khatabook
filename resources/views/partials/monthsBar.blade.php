<section class="months-bar-section">
    <div class="buttons is-centered">
        <b-button tag="a"
                  href="{{route('activities.create')}}"
                  class="is-rounded is-primary has-text-black has-text-weight-bold"
                  >
            {{__('general.new-activity')}}
        </b-button>
    </div>
</section>

@auth
<months-bar :months="{{json_encode($months)}}"></months-bar>
@endauth
