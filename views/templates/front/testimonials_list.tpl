<h2>Testimonials !</h2>

<h3>All Testimonials</h3>
<section class="testimonials-list">
{foreach from=$testimonials item=testimonial}
<p>bnr</p>
        <article class="testimonial">
            <h4>{$testimonial.title}</h4>
            <span>{$testimonial.publication_date|date_format}</span>
            <p>{$testimonial.body|truncate:80:"...":true}</p>
        </article>
{/foreach}
</section>
