Lab Activity 6

#Answers

Q1 You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

 - No new route is needed because the router only checks the path of the URL. The genre and rate are query parameters, so they can use the same /comics route.

Q2 Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

 - The URL would be /students/all/4. all means no course filter, and 4 means year 4. This is because route parameters are part of the URL path.

Q3 Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

 - The detail page needed a change because it has a different path, like /comics/5. The filter did not need a change because ?genre=Action is only a query parameter.

Q4 You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

 - I removed the old filter method because I don't use it anymore. The store and update methods are used for adding and changing data, so I can keep them for future use.
