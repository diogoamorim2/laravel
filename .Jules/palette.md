## 2024-05-22 - Navigation Active States
**Learning:** Users were getting lost in the navigation because there was no visual indication of the current page. Consistent navigation structure across pages is crucial for maintainability and user orientation.
**Action:** Extracted navigation to a partial and implemented route-based active states.

## 2024-05-23 - Media Facade Loading State
**Learning:** Replacing static thumbnails with iframes can cause a "white flash" or empty state if the network is slow. Providing immediate feedback (spinner) maintains perceived performance and responsiveness.
**Action:** Implemented a loading spinner that appears immediately upon interaction, before the iframe loads.
