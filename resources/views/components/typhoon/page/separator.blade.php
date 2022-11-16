<div class="hidden md:block col-span-12 {{ $backgroundColor }} max-w-screen-7xl relative h-24">


@switch($separatorType)
    @case('curved-line')
        <div class="-top-0.5 absolute w-screen">
            <svg width="100%" height="120" viewBox="0.1 0.1 180 40" preserveAspectRatio="none">
                <g transform="translate(-18.298844,-77.973964)">
                    <path class="{{ $fillColor2 }}" d="M 31.615583,86.351641 H 192.16499 v 26.901969 c 0,0 -32.03411,-14.237983 -59.62682,-12.72484 -22.34188,1.2252 -54.779359,9.72634 -54.779359,9.72634 0,0 -22.029534,3.62882 -34.471238,-1.88988 -12.441702,-5.51871 -11.67199,-22.013589 -11.67199,-22.013589 z" />
                    <path class="{{ $fillColor1 }}" d="M 18.441597,78.106256 H 198.58126 v 39.288614 c 0,0 -43.10672,-27.825245 -73.47599,-19.687823 -30.369264,8.137423 -46.832208,12.548653 -46.832208,12.548653 0,0 -32.775418,8.05972 -46.735258,0 C 17.577964,102.19598 18.441597,78.106256 18.441597,78.106256 Z" />
                </g>
            </svg>
        </div>
        @break
    @case('broken-line')
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="140" viewBox="0.5 0.2 176 30" preserveAspectRatio="none">
            <g transform="translate(-13.668562,-111.38266)">
                <path class="{{ $fillColor1 }}" d="M 13.898015,111.51495 H 190.83044 v 26.19241 l -45.97036,-14.43255 -42.22858,7.48354 -45.970361,-14.96709 -31.003265,16.03617 z"/>
            </g>
        </svg>
        @break
    @case('pixelator')
        <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="100%" height="166.61502" viewBox="0.4 0.2 200 44" preserveAspectRatio="none">
            <g class="separator" transform="translate(-9.2218046,-83.494585)">
                <path class="{{ $fillColor2 }}" d="M 9.484815,89.716055 H 209.81018 V 126.90507 L 110.46368,93.705147 9.579391,127.39334 Z" />
                <path class="{{ $fillColor1 }}" d="M 9.3544335,83.626877 H 209.68181 V 120.29057 L 110.46368,93.705147 9.4490103,120.77195 Z" />
            </g>
        </svg>
        @break
    @case('sure')
        <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="100%" height="120" viewBox="0.2 0 178 30" preserveAspectRatio="none">
            <g transform="translate(-14.514284,-115.36352)">
                <path class="{{ $fillColor2 }}" d="m 14.74107,115.49581 h 178.02679 v 30.61607 h -29.10417 v -12.47321 h -10.58333 v -8.31548 h -13.98512 v 13.98512 h -20.41072 v -13.98512 h -8.31547 v 7.18155 h -7.18155 v 10.9613 H 85.422617 v -10.9613 H 68.791666 V 121.54343 H 51.40476 v 15.875 H 29.860117 v -9.82739 h -8.693452 v -7.55952 h -6.520089 v -4.53571 z" />
                <path class="{{ $fillColor1 }}" d="M 14.741071,112.54762 H 192.76786 v 30.61607 H 163.66369 V 130.69048 H 153.08036 V 122.375 h -13.98512 v 13.98512 H 118.68452 V 122.375 h -8.31547 v 7.18155 h -7.18155 v 10.9613 H 85.422617 v -10.9613 H 68.791666 V 118.59524 H 51.40476 v 15.875 H 29.860118 v -9.82739 h -8.693452 v -7.55952 h -6.520089 v -4.53571 z"/>
            </g>
        </svg>
        @break
    @case('ok-lets-go')
        <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="100%" height="90" viewBox="0.1 0.3 200 19" preserveAspectRatio="none">
            <g transform="translate(-0.21755166,-100.15454)">
                <path class="{{ $fillColor1 }}" d="M 0.2688579,100.29477 H 200.98548 c 0,0 -99.37375,39.84098 -200.7166221,0 z" />
            </g>
        </svg>
        @break
    @default
    @case('sharp-line')
        <svg class="separator-bottom" xmlns="http://www.w3.org/2000/svg" width="100%" height="120" viewBox="0.2 0 151 27" preserveAspectRatio="none" transform="scale(1,-1)">
            <g transform="translate(-18.766517,-159.24846)">
                <path class="{{ $fillColor2 }}" d="m 18.898809,169.7732 h 11.150298 v -10.20536 l 10.016369,10.01637 10.016369,10.01637 v -9.82738 h 20.032738 v -10.20536 l 20.127232,20.12723 v -9.92187 h 19.938245 v -10.01637 l 19.93824,19.93824 v -9.92187 h 19.93824 v -10.20536 l 20.12723,20.12723 v 5.19718 H 18.898809 Z" />
            <path class="{{ $fillColor1 }}" d="m 18.898809,171.88988 h 11.150298 v -10.20536 l 10.016368,10.01637 10.016368,10.01637 v -9.82738 h 20.032739 v -10.20536 l 20.127233,20.12723 v -9.92187 h 19.938245 v -10.01637 l 19.93824,19.93824 v -9.92187 h 19.93825 v -10.20536 l 20.12723,20.12723 v 5.19718 H 18.898809 Z"/>
            </g>
        </svg>
        @break
@endswitch

</div>