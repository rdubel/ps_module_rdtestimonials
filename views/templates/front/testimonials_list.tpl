<h2>Testimonials !</h2>

<h3>All Testimonials</h3>
<section class="testimonials-list">
{foreach from=$testimonials item=testimonial}
    <a href="{$testimonial.link}">
        <article class="testimonial">
            <h4>{$testimonial.title}</h4>
            <span>{$testimonial.publication_date|date_format}</span>
            <p>{$testimonial.body|truncate:80:"...":true}</p>
        </article>
    </a>
{/foreach}
</section>
