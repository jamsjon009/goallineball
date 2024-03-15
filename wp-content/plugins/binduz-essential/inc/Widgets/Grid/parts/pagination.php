<?php 



// stop execution if there's only 1 page
if ( $query->max_num_pages <= 1 ){
    return;
}
if(is_front_page()){
    $paged	 = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1;
   
}else{
    $paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
}

$max	 = intval( $query->max_num_pages );

// add current page to the array
if ( $paged >= 1 ){
    $links[] = $paged;
}

// add the pages around the current page to the array
if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
}

if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
}

echo  '<nav aria-label="Page navigation">';

echo '<ul class="pagination">' . "\n";

// previous Post Link
if ( get_previous_posts_link() ){
    printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link( '<i class="fal fa-long-arrow-left"></i>' ) );
}

// link to first page, plus ellipses if necessary
if ( !in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active page-item"' : ' class=" page-item"';

    printf( '<li %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( !in_array( 2, $links ) )
        echo '<li class="page-item"><a class="binduz-er-page-link" href="javascript:void(0">---</a></li>';
}

// link to current page, plus 2 pages in either direction if necessary
sort( $links );
foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active page-item"' : 'class=" page-item"';
    printf( '<li %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
}

// link to last page, plus ellipses if necessary
if ( !in_array( $max, $links ) ) {
    if ( !in_array( $max - 1, $links ) )
        echo '<li class="page-item"><a class="binduz-er-page-link" href="javascript:void(0">---</a></li>' . "\n";

    $class = $paged == $max ? ' class="active page-item"' : 'class=" page-item"';
    printf( '<li %s><a class="page-link" href="%s" >%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
}

// next Post Link
if ( get_next_posts_link() ){
    printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link( '<i class="fal fa-long-arrow-right"></i>' ) );
}

echo '</ul></nav>' . "\n";