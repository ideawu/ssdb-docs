# HA - SSDB High Availability Solution

This documentation describes how some SSDB users use SSDB in High Availability way.

### Make (nearly) Real-time Copies of Data

You can make (nearly) real-time copies of data in a SSDB server, by configuring and deploying as described in: [SSDB Replication](./replication.html).

Most people use the Master-Slaves hierachy.

### How Applications Works with SSDB?

Your applications should only invoke write requests to the Master node, and read request to the Master or Slave node(s).

Once the Master node failed down, you should configure you applications to invoke all requests(write and read) to EXACTLY one Slave node, remove the failed down Master node, and all other Slave node(s) if any.

Now the chosen Slave node becomes Master, make you new replication hierachy again.

WARNING: the data of removed Master node and Slave node(s) must be physically removed from disk and can not be used by any means.

### How HA?

In this way, SSDB works in a HA way, highly depends on human's decision and operation.
