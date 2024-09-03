<h2>
    {{ $job->title }}
</h2>

<p>
    Félications! Votre Job est actuellement sur notre site
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">
        View your Job Listing
    </a>
</p>
