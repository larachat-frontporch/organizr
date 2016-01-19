# Bitwise Operations in Organizr

Organizr uses bitwise operations to convert the user input from the calendar to a binary representation of the user's availability over an entire year.

A user's availability for a given week is represented as a 672-bit binary number, where every binary is another 15 minutes, and the most significant digit represents 00:00 on the Monday of the week, **in the user's local timezone**.

As a result of aforementioned representation, every day is represented as 96 bits. This means a binary left-shift of 96 bits will move the availability 24h earlier, and a right-shift 24h later.

## Current issues

If a user in UTC+7 enters him/herself available at 01:00 on Monday morning, this should become Sunday 18:00. We do not yet have a way of handling the time changes that forces a transition from Sunday to Monday or the reverse, when converted to UTC.